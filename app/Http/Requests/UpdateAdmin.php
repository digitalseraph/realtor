<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /** @var \App\Admin */
        $admin = $this->route('admin');

        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password'  => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        
        foreach ($errors as $field => $messages) {
            $msg = '';
            foreach ($messages as $message) {
                $msg .= "$message<br />";
            }
            // Toastr::error("$msg", "Error Updating Admin");
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
}
