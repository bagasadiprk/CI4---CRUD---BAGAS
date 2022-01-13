<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User;
use Firebase\JWT\JWT;

class AuthController extends BaseController
{
    use ResponseTrait;

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        $data = $this->request->getJSON(true);
        $user = $this->userModel->where(['email' => $data['email']])->first();
        $dateTime = new \DateTime();

        if (!$user) return $this->respond(['message' => 'User tidak ditemukan'], 401);

        if (!password_verify($data['password'], $user['password'])) {
            return $this->respond(['message' => 'Email atau password salah'], 401);
        }

        $payload = [
            'iat' => $dateTime->getTimestamp(),
            'nbf' => $dateTime->getTimestamp(),
            'id' => $user['id']
        ];

        return $this->respond([
            'token' => JWT::encode($payload, getenv('TOKEN_SECRET')),
            'type' => 'Bearer',
            'message' => 'Login berhasil'
        ]);
    }
}
