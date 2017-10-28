<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StorePage extends FormRequest
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
        return [
            'title'             => 'required|string|max:255|unique:pages,title,',
            'sub_title'         => 'required|string|max:255',
            'body'              => 'required',
            'link_text'         => 'required|string|max:255|unique:pages,link_text,',
            'link_description'  => 'required|string|max:255',
            'active'            => 'required|boolean',
            'priority'          => 'required|integer',
            'created_by'        => 'required|integer',
            'modified_by'       => 'required|integer',
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
            // Toastr::error("$msg", "Error Storing page");
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
}
