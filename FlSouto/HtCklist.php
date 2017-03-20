<?php

namespace FlSouto;

class HtCklist extends HtChoice{
	
	protected $separator = '<br/>';

	function __construct($name){
		parent::__construct($name);
		$this->fallback([]);
	}

	function fallback($fallback, $when=[null]){
		if($when===[null]){
			$when[] = [];
		}
		return parent::fallback($fallback,$when);
	}

	function separator($separator){
		$this->separator = $separator;
		return $this;
	}

	function process($force=false){
		if(!empty($this->fallback)){
			if($this->param->defined()||isset($this->context[$this->getSubmitFlag()])){
				$this->fallback([]);
			}
		}
		$result = parent::process($force);
		return $result;
	}

	function renderReadonly(){
		$attrs = new HtAttrs([
			'type' => 'hidden',
			'name' => $this->name(),
			'value' => $this->value()
		]);
		$this->readonly = true;
		$this->renderWritable();
	}

	function renderWritable(){
		$this->resolveOptions();
		$array = $this->value();
		echo "\n";
		foreach($this->options as $value2 => $label){
			echo "<label>";
			$attrs = new HtAttrs([
				'type' => 'checkbox',
				'name' => $this->name().'[]',
				'value' => $value2
			]);
			foreach($array as $value){
				if($this->compareOptionsValues($value2,$value)){
					$attrs['checked'] = 'checked';
					break;
				}
			}
			if($this->readonly){
				$attrs['disabled'] = 'disabled';
			}
			echo "<input $attrs />";
			echo $label;
			echo "</label>";
			echo $this->separator;
			echo "\n";
		}
		$hidden_attrs = new HtAttrs(['type'=>'hidden','name'=>$this->getSubmitFlag(),'value'=>1]);
		echo "<input {$hidden_attrs} />";
	}

}