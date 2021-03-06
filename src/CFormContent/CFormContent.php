<?php
/**
* A form to manage content.
* 
* @package LatteCore
*/
class CFormContent extends CForm {

  /**
   * Properties
   */
  private $content;

  /**
   * Constructor
   */
  public function __construct($content,$groups) {
    parent::__construct();
    $this->content = $content;
    
    $out_allgroups = array('Everybody');
    foreach($groups as $ogroup) {
	    $out_allgroups[$ogroup['id']] = 'Member of: '.$ogroup['name'];
    }
    
    $filter = array('plain'=>'plain','php'=>'php','html'=>'html','htmlpurify'=>'htmlpurify','make_clickable'=>'make_clickable','bbcode'=>'bbcode','markdown'=>'markdown','markdownextra'=>'markdownextra','smartypants'=>'smartypants','typographer'=>'typographer');
    
    $save = isset($content['id']) ? 'save' : 'create';
    $this->AddElement(new CFormElementHidden('id', array('value'=>$content['id'])))
         ->AddElement(new CFormElementText('title', array('value'=>$content['title'],'class'=>'input-width-500')))
         ->AddElement(new CFormElementText('linktext', array('value'=>$content['linktext'],'class'=>'input-width-500')))
         ->AddElement(new CFormElementTextarea('data', array('label'=>'Content:', 'value'=>$content['data'],'class'=>'input-width-500 input-height-300')))
         ->AddElement(new CFormElementText('type', array('value'=>$content['type'])))
         ->AddElement(new CFormElementSelect('filter', array('options'=>$filter, 'value'=>$content['filter'])))
         ->AddElement(new CFormElementSelect('accesslevel', array('options'=>$out_allgroups, 'label' => 'Access level', 'value' => $content['accesslevel'])))
         ->AddElement(new CFormElementSubmit($save, array('callback'=>array($this, 'DoSave'), 'callback-args'=>array($content))))
         ->AddElement(new CFormElementSubmit('delete', array('callback'=>array($this, 'DoDelete'), 'callback-args'=>array($content))));

    $this->SetValidation('title', array('not_empty'))
         ->SetValidation('linktext', array('not_empty'));
  }
  

  /**
   * Callback to save the form content to database.
   */
  public function DoSave($form, $content) {
    $content['id']    = $form['id']['value'];
    $content['filter'] = $form['filter']['value'];
    $content['accesslevel'] = $form['accesslevel']['value'];
    $content['title'] = $form['title']['value'];
    $content['linktext']   = $form['linktext']['value'];
    $content['data']  = $form['data']['value'];
    $content['type']  = $form['type']['value'];
    return $content->Save();
  }


  /**
   * Callback to delete the content.
   */
  public function DoDelete($form, $content) {
    $content['id'] = $form['id']['value'];
    $content->Delete();
    CLatte::Instance()->RedirectTo('content');
  }
  
  
  
}