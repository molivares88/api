<?php

class ApiController extends AppController
{
    var $name = 'Api';

    var $uses = array('BusinessCategories','BusinessPackages','BusinessDescription','BusinessServices','BusinessEvents','BusinessReviews');

    var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Session');

    var $components = array('RequestHandler', 'Session', 'Email', 'Cookie');

    function beforeFilter()
    {
        $this->layout = 'json';
    }

    function json_response($data)
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    /**
    Table categories
     */
    function bi_categories_getall()
    {
        try {
            $data = $this->BusinessCategories->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_get_id($id)
    {
        try {
            $data = $this->BusinessCategories->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_create()
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "INSERT INTO business_category  VALUES(default, '$name')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "Update business_category SET name='$name' WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->BusinessCategories->query(
                    "Delete From business_category WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $categories = $this->BusinessCategories->query("SELECT * FROM business_category WHERE name LIKE $condition limit 3");
            $this->json_response($categories);
        } else {
            $categories = $this->BusinessCategories->find('all');
            $this->json_response($categories);
        }
    }

        /**
    Table categories
     */
    function bi_categories_getall()
    {
        try {
            $data = $this->BusinessCategories->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_get_id($id)
    {
        try {
            $data = $this->BusinessCategories->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_create()
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "INSERT INTO business_category  VALUES(default, '$name')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "Update business_category SET name='$name' WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_    /**
    Table categories
     */
    function bi_categories_getall()
    {
        try {
            $data = $this->BusinessCategories->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_get_id($id)
    {
        try {
            $data = $this->BusinessCategories->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_create()
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "INSERT INTO business_category  VALUES(default, '$name')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "Update business_category SET name='$name' WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->BusinessCategories->query(
                    "Delete From business_category WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_    /**
    Table packages
     */
    function bi_packages_getall()
    {
        try {
            $data = $this->BusinessPackages->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_get_id($id)
    {
        try {
            $data = $this->BusinessPackages->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_create()
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessPackages->query(
                    "INSERT INTO Business_Packages  VALUES(default, '$name')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessPackages->query(
                    "Update business_packages SET name='$name' WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->Business_Packages->query(
                    "Delete From business_packages WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $packages = $this->BusinessPackages->query("SELECT * FROM business_packages WHERE name LIKE $condition limit 3");
            $this->json_response($packages);
        } else {
            $categories = $this->BusinessPackages->find('all');
            $this->json_response($packages);
        }
    }_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $categories = $this->BusinessCategories->query("SELECT * FROM business_category WHERE name LIKE $condition limit 3");
            $this->json_response($categories);
        } else {
            $categories = $this->BusinessCategories->find('all');
            $this->json_response($categories);
        }
    }_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->BusinessCategories->query(
                    "Delete From business_category WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_packages_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $categories = $this->BusinessCategories->query("SELECT * FROM business_category WHERE name LIKE $condition limit 3");
            $this->json_response($categories);
        } else {
            $categories = $this->BusinessCategories->find('all');
            $this->json_response($categories);
        }
    }
    

}

?>