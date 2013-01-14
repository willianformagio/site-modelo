<?php

class IMAGE{

	private $image,	$filename, $orinal_info, $width, $height;
	//private $water_mark = "/var/www/campus/php/scripts/manipulando_img/walter_mark.png";
	//private $url_patch = "e:\home\websocorro\web\campus\portaldosol\sistema-depoimentos\fotos\ ";
	private $url_patch = "../sistema-depoimentos/fotos/";
	function __construct($filename = null) {
		if( $filename ) $this->load($filename);

	}

	function __destruct(){
		//if( $this->filename )imagedestroy($this->image); 
	}

	//
	// Carrega a imagem
	//
	// 		$filename - A Imagem que esta sendo enviada (necessário)
	//
	public function load($filename){

		if( !extension_loaded('gd') ) throw new Exception('Necessário carregar a extensão do GD.');

		$this->filename = $filename;

		$info = getimagesize($this->filename['tmp_name']);

		switch( $info['mime'] ){

			case 'image/gif':
				$this->image = imagecreatefromgif($this->filename['tmp_name']);
				break;

			case 'image/jpeg':
				$this->image = imagecreatefromjpeg($this->filename['tmp_name']);
				break;

			case 'image/png':
				$this->image = imagecreatefrompng($this->filename['tmp_name']);
				break;

			default:
				throw new Exception("O Arquivo enviado não é uma imagem", $this->filename['tmp_name']);
				
		}

		$this->original_info =  array(
			'width' => $info[0], 
			'height' => $info[1],
			'orientation' => $this->get_orientation(),
			'exif' => function_exists('exif_read_data') ? $this->exif = @exif_read_data($this->filename) : null,
			'format' => preg_replace('/^image\//', '', $info['mime']),
			'mime' => $info['mime']
		);

		$this->width = $info[0];
		$this->height = $info[1];

	}

	//
	// Salva uma imagem;
	// 		$filename - O arquivo que queremos salvar (Padrões originais do arquivo)
	// 		$quality - 0-9 para PNG, 0-100 para JPEG;
	//
	//
	// Notas:
	// 		O resultado da qualidade será determinado pela extensão do arquivo;
	//
	public function save($filename = null, $quality = null, $name_image = null){

		if( !$filename ) $filename = $this->filename;
		if( !$name_image ) $name_image = $this->filename['name'];

		// Deterinamos o formato via extensão do arquivo (Chamamos de volta o formato original)$font_file - A fonte a ser utilizada - Verdana
		$format = $this->file_ext($filename);

		if( !$format ) $format = $this->orinal_info['format'];

		// Determinamos o formato de saída;
		switch( $format ) {

			case 'gif':
				$result = imagegif($this->image, trim($this->url_patch) . $name_image);
				break;

			case 'jpg':
			case 'JPG':
			case 'jpeg':
				if ( $quality === null ) $quality = 85;
				$quality = $this->keep_within($quality, 0, 100);
				$result = imagejpeg($this->image, trim($this->url_patch) . $name_image, $quality);
				break;

			case 'png':
				if ( $quality === null ) $quality = 9;
				$quality = $this->keep_within($quality, 0, 9);
				$result = imagepng($this->image, trim($this->url_patch) . $name_image, $quality);
				break;

			default:
				throw new Exception("Formato nao suportado");
				
		}

		if( !$result ) throw new Exception("Nao foi possivel salvar a imagem: " . $filename['name']);
		
		return $this;
	}


	//
	// Reajusta o tamanho da imagem de acordo com o novo tamanho passado
	//		$width - A largura resultante para a nova imagem
	//		$height - A altura resultante para a nova imagem
	//
	public function resize($width, $height) {

		$new = imagecreatetruecolor($width, $height);
		imagealphablending($new, false);
		imagesavealpha($new, true);
		imagecopyresampled($new, $this->image, 0, 0, 0, 0, $width, $height, $this->width, $this->height);

		$this->width = $width;
		$this->height = $height;
		$this->image = $new;

		return $this;

	}

	//
	// Ajustar a largura (Reajusta o tamanho da imagem conforme a largura especificada)
	//
	public function fit_to_width($width) {

		$aspect_ratio = $this->height / $this->width;
		$height = $width * $aspect_ratio;
		return $this->resize($width, $height);

	}

	//
	// Ajustar a altura (Reajusta o tamanho da imagem conforme a altura especificada)
	//
	public function fit_to_height($height) {

		$aspect_ratio = $this->height / $this->width;
		$width = $height / $aspect_ratio;
		return $this->resize($width, $height);

	}

	//
	// Melhor ajuste (ajuste proporcional  ao valor especificado pelo $width/$height)
	//
	public function best_fit($max_width, $max_height) {

		if( $this->width <= $max_width && $this->height <= $max_height ) return $this;

		// Calculamos a relação de tamanhos
		$aspect_ratio = $this->height / $this->width;

		// Fazemos o ajuste da largura conforme as novas dimensões
		if( $this->width > $max_width ) {
			$width = $max_width;
			$height = $width * $aspect_ratio;
		} else {
			$width = $this->width;
			$height = $this->height;
		}

		// Fazemos os ajuste da altura conforme as novas dimensões
		if( $height > $max_height ) {
			$height = $max_height;
			$width = $height / $aspect_ratio;
		}

		return $this->resize($width, $height);

	}


	//
	// Recortar imagem
	// 		$x1 - left
	//		$y1 - top
	//		$x2 - right
	//		$y2 - botton
	//
	public function crop($x1, $y1, $x2, $y2) {
		// Determinamos o tamanho do recorte
		if( $x2 < $x1 ) list($x1, $x2) = array($x2, $x1);
		if( $y2 < $y1 ) list($y1, $y2) = array($y2, $y1);
		$crop_width = $x2 - $x1;
		$crop_height = $y2 - $y1;

		$new = imagecreatetruecolor($crop_width, $crop_height);
		imagealphablending($new, false);
		imagesavealpha($new, true);
		imagecopyresampled($new, $this->image, 0, 0, $x1, $y1, $crop_width, $crop_height, $crop_width, $crop_height);

		$this->width = $crop_width;
		$this->crop_height = $crop_height;
		$this->image = $new;

		return $this;
		
	}

	//
	// Recorte Quadrado
	// Ótimo para criação de Thumbnails
	//		$size - The tamnho em pixels da imagem resultante (altura e largura são iguais) (Parametro Opcional)
	//
	public function square_crop($size = null) {

		// Calculamos as medidas
		if( $this->width > $this->height ) {
			// Paisagem
			$x_offset = ($this->width - $this->height) / 2;
			$y_offset = 0;
			$square_size = $this->width - ($x_offset * 2);

		} else {
			// Retrato
			$x_offset = 0;
			$y_offset = ($this->height - $this->width) / 2;
			$square_size = $this->height - ($y_offset * 2);

		}

		// Aparamos o quadrado
		$this->crop($x_offset, $y_offset, $x_offset + $square_size, $y_offset + $square_size);

		// Resize
		if( $size ) $this->resize($size, $size);

		return $this;

	}

	//
	// Texto - Adiciona texto a uma imagem
	// 		$text - O texto que se pretende adicionar (required)
	//		$font_file - A fonte a ser utilizada - Verdana
	//		$font_size - tamanho da fonte em pixels
	//		$color -Cor da fonte em exadecimal - #FFFFFF
	//		$position - Posição do texto sobre a imagem:
	//					'center', 'top', 'left', 'bottom', 'right',
	//					'top left', 'top right', 'bottom left', 'bottom right'
	//		$x_offset - Compemsação horizontal em pixels
	//		$y_offset - Compensação vertical em pixels
	//
	public function text($text, $font_file, $font_size = '12', $color = '#000000', $position = 'center', $x_offset = 0, $y_offset = 0) {

		// Este método pode ser melhorado para aceitar textos com angulos
		$angle = 0;
		$rgb = $this->hex2rgb($color);
		$color = imagecolorallocate($this->image, $rgb['r'], $rgb['g'], $rgb['b']);

		// Determinamos o tamanho da caixa de texto
		$box = imagettfbbox($font_size, $angle, $font_file, $text);
		if( !$box ) throw new Exception("Não foi possível carregar a fonte: " . $font_file);
		$box_width = abs($box[6] - $box[2]);
		$box_height = abs($box[7] - $box[1]);

		// Determinamos a posição do texto
		switch ( strtolower($position) ) {
			case 'top left':
				$x = 0 + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;

			case 'top right':
				$x = $this->width - $box_width + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;

			case 'top':
				$x = ($this->width / 2) - $box_width + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;

			case 'bottom left':
				$x = 0 + $x_offset;
				$y = $this->height - $box_height + $y_offset + $box_height;
				break;

			case 'bottom right':
				$x = 0 + $this->width - $box_width + $x_offset;
				$y = 0 + $this->heigth - $box_height + $y_offset + $box_height;
				break;

			case 'bottom':
				$x = 0 + ($this->width / 2) - ($box_width / 2) + $x_offset;
				$y = 0 + $this->height - $box_height + $y_offset + $box_height;
				break;
			
			case 'left':
				$x = 0 + $x_offset;
				$y = ($this->height / 2) - (($box_height / 2) - $box_height) + $y_offset;
				break;

			case 'right':
				$x = $this->width - $box_width + $x_offset;
				$y = ($this->height / 2) - (($box_height / 2) - $box_height) + $y_offset;
				break;

			case 'center':
			default:
				$x = ($this->width / 2) - ($box_width / 2) + $x_offset;
				$y = ($this->height / 2) - ($box_height / 2) + $y_offset;
				break;
		}

		imagettftext($this->image, $font_size, $angle, $x, $y, $color, $font_file, $text);

		return $this;

	}
	
	//
	// Marca d'água - Adiciona uma imagem sobre a uma imagem
	// 		$mark_water - O texto que se pretende adicionar (required)
	//		$font_file - A fonte a ser utilizada - Verdana
	//		$font_size - tamanho da fonte em pixels
	//		$color -Cor da fonte em exadecimal - #FFFFFF
	//		$position - Posição do texto sobre a imagem:
	//					'center', 'top', 'left', 'bottom', 'right',
	//					'top left', 'top right', 'bottom left', 'bottom right'
	//		$x_offset - Compemsação horizontal em pixels
	//		$y_offset - Compensação vertical em pixels
	//
	public function water_mark($image = null, $water_mark = null, $position = 'center', $x_offset = 0, $y_offset = 0, $opacity = 100) {

		if( $image == null) $image = $this->image;
		if( $water_mark == null) $water_mark = $this->water_mark;

		$info_water_mark = getimagesize($water_mark);
		$water_mark = imagecreatefrompng($water_mark);
		$water_mark_width = $info_water_mark[0];
		$water_mark_height = $info_water_mark[1];

		switch ( strtolower($position) ) {
			case 'top left':
				$x = $x_offset;
				$y = $y_offset;
				break;

			case 'top right':
				$x = $this->width - $water_mark_width + $x_offset;
				$y = $y_offset;
				break;

			case 'top':
				$x = ($this->width / 2) - ($water_mark_width / 2) + $x_offset;
				$y = $y_offset;
				break;

			case 'bottom left':
				$x = $x_offset;
				$y = $this->height - $water_mark_height + $y_offset;
				break;

			case 'bottom right':
				$x = $this->width - $water_mark_width + $x_offset;
				$y = $this->height - $water_mark_height + $y_offset;
				break;

			case 'bottom':
				$x = 0 + ($this->width / 2) - ($water_mark_width / 2) + $x_offset;
				$y = 0 + $this->height - $water_mark_height + $y_offset;
				break;
			
			case 'left':
				$x = $x_offset;
				$y = ($this->height / 2- ($water_mark_height / 2)) + $y_offset;
				break;

			case 'right':
				$x = $this->width - $water_mark_width + $x_offset;
				$y = ($this->height / 2 - ($water_mark_height / 2)) + $y_offset;
				break;

			case 'center':
			default:
				$x = ($this->width / 2) - ($water_mark_width / 2) + $x_offset;
				$y = ($this->height / 2) - ($water_mark_height / 2) + $y_offset;
				break;
		}

		imagecopymerge($this->image, $water_mark, $x, $y, 0, 0, $water_mark_width, $water_mark_height, $opacity);

		return $this;

	}

	//
	// Verifica qual a orientação da imagem
	//		landscape: Paisagem
	//		portrait: Retrato
	//		square: quadrado
	//
	public function get_orientation() {

		if( imagesx($this->image) > imagesy($this->image) ) return 'landscape';
		if( imagesx($this->image) < imagesy($this->image) ) return 'portrait';
		return 'square';

	}

	//
	// Retorna a extensão do arquivo especificado
	//
	public function file_ext($filename = null) {

		if( !$filename ) $filename = $this->filename;

		if( !preg_match('/\./', $filename['name']) ) return '';

		return preg_replace('/^.*\./', '', $filename['name']);

	} 

	//
	// Verifica o valor de escala minima e máxima
	// Se baixo, o valor $min é retornado, se maior, o valor $max é retornado.
	//
	private function keep_within($value, $min, $max) {
		if( $value < $min ) return $min;
		if( $value > $max ) return $max;
		return $value;
	}

	//
	// Converte cores hexadecimais em RGB
	//
	private function hex2rgb($hex_color) {
		if( $hex_color[0] == '#') $hex_color = substr($hex_color, 1);
		if( strlen($hex_color) == 6 ) {
			list($r, $g, $b) = array(
				$hex_color[0] . $hex_color[1],
				$hex_color[2] . $hex_color[3],
				$hex_color[4] . $hex_color[5]
			);
		} elseif( strlen($hex_color) == 3 ) {
			list($r, $g, $b) = array(
				$hex_color[0] . $hex_color[0],
				$hex_color[1] . $hex_color[1],
				$hex_color[2] . $hex_color[2]
			);
		} else{
			return false;
		}

		return array(
				'r' => hexdec($r),
				'g' => hexdec($g),
				'b' => hexdec($b),
			);

	}


	public function get_width(){

		return $this->width;

	}

	public function get_height(){
		
		return $this->height;

	}

}
?>