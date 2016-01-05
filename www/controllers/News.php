<?php
namespace Application\Controllers;
use Application\Models\News as NewsModel;


class News
{

    public function actionAll()
    {

            $news = NewsModel::findAll();
            $view=new \View();
            $view->items=$news;
            $view->display('news/all.php');

    /*
        $news=News::getAll();
        $view=new View();

        //$view->assign('items',$news);
        //$view->assign('items',$news);
        $view->items=$news;

        //foreach ($view as $k=>$v){
        //    echo $k;
        //}


        $view->display('news/all.php');*/
    }

    public function actionOne()
    {

        $id=$_GET['id'];
        $item=NewsModel::getOne($id);
        $view=new \View();
        $view->assign('items',$item);
        $view->display('news/one.php');
    }
}