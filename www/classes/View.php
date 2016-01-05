<?php

Class View
    implements Countable
{

    protected $data=[];

    //public $items;

    //public function assign($name,$value)
    //{
    //    $this ->data[$name]=$value;
    //}

    public function __set($k, $v)
    {
        $this->data[$k]=$v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template)
    {
        //$this->data['items']-->$items
        foreach($this->data as $key=>$val){
            $$key=$val;
        }
        ob_start();
        include __DIR__.'/../views/'.$template;
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}