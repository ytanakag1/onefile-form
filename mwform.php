<?php
/*基底クラス*/
class InputType{
  protected $type ='';
  protected $name ='' ;
  protected $value ='' ; //値が無い場合に備える 
  protected $class ='' ;
  protected $id ='' ;
  protected $required ='' ;
  protected $disabled ='' ;
  protected $label ='' ;

  function set_attr($attr){
    foreach ($attr as $key => $value) {
      $this->$key = $value;
    } 
  }
  
  /*
    ラベルが後ろにつくタイプ
  */
  function out_attr(){
    return "<label><input type='$this->type' name='$this->name'
    value='$this->value' required='$this->required'>
    $this->label</label>";
  }

} // class end

/*
  ラジオボタン専用の子クラス
  */
class InputTypeRadio extends InputType{
  protected $value = [] ; 
  protected $label = [] ; 

  function out_attr(){
    $html = '';
    foreach ($this->value as $key => $val) {
      $html .= "<label><input type='$this->type' name='$this->name'
      value='$val' required='$this->required'>
      {$this->label[$key]}</label>";
    }
    return $html;
  }

}

/*
  ラベルが前につくタイプ
*/
class InputTypeText extends InputType{
  function out_attr(){
    return "<label>$this->label
      <input type='$this->type' name='$this->name'  required='$this->required'>
    </label>";
  }
}
