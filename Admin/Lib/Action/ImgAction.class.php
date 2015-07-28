<?php
class ImgAction extends Action {
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
}