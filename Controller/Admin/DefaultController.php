<?php

namespace Controller\Admin;

use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackRepository;
use Model\Entity\Feedback;
use Library\Request;
use Library\Session;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->get('repository')->getRepository('Articles');
        $categories_count=$repository->countCategories();
        $analytic_articles=$repository->findLatestAnalytics();
        dump($analytic_articles);
        $categories_names= $repository->getCategories_names();
        $categories_ids=$repository->getCategories_ids();

        for ($category_id=1; $category_id <=$categories_count ; $category_id++) {
            $category_articles[$category_id] = $repository->findLatestArticle ($category_id);
        };

        //$articles_count - Количество статей в слайдере
        $articles_count=4;
        $latest_articles=$repository->findLatestArticle2 ($articles_count);

        $data = [
            'category_articles' => $category_articles,
            'latest_articles' => $latest_articles,
            'categories_count' => $categories_count,
            'categories_names' =>$categories_names,
            'categories_ids' =>$categories_ids,
            'analytic_articles' =>$analytic_articles


        ];
//        dump($this->get('router'));
        if(session::get('admin')){
            return $this->render('index.phtml',$data);
        }
//        }else{
//            echo 'tyt';
//            dump($this->get('router')->redirectToRoute('index'));
//            $this->get('router')->redirectToRoute('login');
//        }
        else{
                return $this->render('tryagain.phtml',$data);
    }


    }
}