<?php
/**
 * һ��С��
 * @category Think
 * @author   liusj 
 * @version  2017-09-28
 */
class Validate {
		private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//�������
		private $code;//��֤��
		private $codelen;//��֤�볤��
		private $width;//���
		private $height;//�߶�
		private $img;//ͼ����Դ���
		private $font;//ָ��������
		private $fontsize;//ָ�������С
		private $fontcolor;//ָ��������ɫ
		//���췽����ʼ��
		public function __construct() {
		$this->font = dirname(dirname(dirname(__FILE__))).'/Public/font/elephant.ttf';//ע������·��Ҫд�ԣ�������ʾ����ͼƬ
		//$this->font = __ROOT__.'/Public/font/elephant.ttf';//ע������·��Ҫд�ԣ�������ʾ����ͼƬ
		//	$this->font = __ROOT__.'/Public/font/elephant.ttf';//ע������·��Ҫд�ԣ�������ʾ����ͼƬ
		}
		//���������
		private function createCode() {
			$this->codelen=C('codelen');
		$_len = strlen($this->charset)-1;
		for ($i=0;$i<$this->codelen;$i++) {
		$this->code .= $this->charset[mt_rand(0,$_len)];
		}
		}
		//���ɱ���
		private function createBg() {
			$this->height=C('height');
			$this->width=C('width');
		$this->img = imagecreatetruecolor($this->width, $this->height);
		$color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
		imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
		}
		//��������
		private function createFont() {
			$this->height=C('height');
			$this->width=C('width');
			$this->fontsize=C('fontsize');
		$_x = $this->width / $this->codelen;
		for ($i=0;$i<$this->codelen;$i++) {
		$this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
		imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
		}
		}
		//����������ѩ��
		private function createLine() {
			$this->width=C('width');
			$this->height=C('height');
		//����
		for ($i=0;$i<6;$i++) {
		$color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
		imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
		}
		//ѩ��
		for ($i=0;$i<100;$i++) {
		$color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
		}
		}
		//���
		private function outPut() {
		header('Content-type:image/png');
		imagepng($this->img);
		imagedestroy($this->img);
		}
		//��������
		public function doimg() {
			//echo C('codelen');die;
			$this->createBg();
			$this->createCode();
			session('verify', md5(strtolower($this->code)));
			$this->createLine();
			$this->createFont();
			$this->outPut();
			
		}
		//��ȡ��֤��
		public function getCode() {
			return strtolower($this->code);
			//$_SESSION['verify']=strtolower($this->code);//����֤�뱣��Ϊsession
		}
}
?>