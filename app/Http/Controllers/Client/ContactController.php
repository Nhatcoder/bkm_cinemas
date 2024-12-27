<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactRequest;
use App\Jobs\SendContactEmailJob;
use App\Listeners\Client\SendContactEmail;
use App\Services\Admin\Contacts\Interfaces\ContactServiceInterface;
use App\Services\Client\Systems\Interfaces\SystemServiceInterface;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    private $systemService;
    private $contactService;

    public function __construct(
        SystemServiceInterface $systemService,
        ContactServiceInterface $contactService
    ){
        $this->systemService = $systemService;
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contact = $this->systemService->getSytemBySlug('lien-he');

        if (empty($contact)) return view('error.client.404');

        return view('client.pages.contact', compact( 'contact'));
    }

    public function submit(ContactRequest $request)
    {
        try {
            $data = $request->contact;
            $user = $this->contactService->create($data);
            SendContactEmailJob::dispatch($user);
            return response()->json(['message' => 'Thành công!'], 201);
        }catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi không xác định!',
            ], 500);
        }
    }
}
