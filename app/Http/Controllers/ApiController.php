<?

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

    protected $statusCode = 200;

    /**
     * Get the value of statusCode
     */ 
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */ 
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Not Found !'){
        return $this->setStatusCode(404)->respondWithError($message);
    }


    public function respond($data, $headers = []){
        
        return Response::json($data, $this->getStatusCode(), $headers); 
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message'       => $message,
                'status_code'   => $this->getStatusCode(),
            ]
        ]);
    }
}