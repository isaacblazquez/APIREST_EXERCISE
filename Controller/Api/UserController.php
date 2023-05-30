<?php
class UserController extends BaseController
{
    /** 
* "/user/list" Endpoint - Get list of users 
*/
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $intLimit = 1;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
                $arrUsers = $userModel->getUsers($intLimit);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function updateAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                if (isset($arrQueryStringParams['user_id']) && $arrQueryStringParams['user_id']) {
                    $user_id = $arrQueryStringParams['user_id'];
             
                }
                if (isset($arrQueryStringParams['username']) && $arrQueryStringParams['username']) {
                    $username = $arrQueryStringParams['username'];
              
                }
                if (isset($arrQueryStringParams['user_email']) && $arrQueryStringParams['user_email']) {
                    $user_email = $arrQueryStringParams['user_email'];
             
                }
                $user_status=0;
                if (isset($arrQueryStringParams['user_status']) && $arrQueryStringParams['user_status']) {
                    if ($arrQueryStringParams['user_status']!=0){
                        $user_status = $arrQueryStringParams['user_status'];
                    }
                }
                $result = $userModel->updateUser($user_id,$username,$user_email,$user_status);    
                $responseData = json_encode($result);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
         // send output 
         if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }



    public function deleteAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                if (isset($arrQueryStringParams['user_id']) && $arrQueryStringParams['user_id']) {
                    $user_id = $arrQueryStringParams['user_id'];
             
                }
                
                $result = $userModel->deleteUser($user_id);    
                $responseData = json_encode($result);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
         // send output 
         if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    public function insertAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                
                if (isset($arrQueryStringParams['username']) && $arrQueryStringParams['username']) {
                    $username = $arrQueryStringParams['username'];
              
                }
                if (isset($arrQueryStringParams['user_email']) && $arrQueryStringParams['user_email']) {
                    $user_email = $arrQueryStringParams['user_email'];
             
                }
                $user_status=0;
                if (isset($arrQueryStringParams['user_status']) && $arrQueryStringParams['user_status']) {
                    if ($arrQueryStringParams['user_status']!=0){
                        $user_status = $arrQueryStringParams['user_status'];
                    }
                }
                $result = $userModel->setUser($username,$user_email,$user_status);    
                $responseData = json_encode($result);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
         // send output 
         if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    
}
?>