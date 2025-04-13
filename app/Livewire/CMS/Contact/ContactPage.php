<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\Component;
use App\Models\Contact;
use App\Services\ContactService;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;

class ContactPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);
    }

    public function changeActive(Contact $contact)
    {
        (new ContactService)->active(contact: $contact);

        return $this->alert('success', 'Change Active Success', [
            'html' => 'Contact has been successfully changed.',
        ]);
    }

    public function delete(Contact $contact)
    {
        (new ContactService)->delete(contact: $contact);

        return $this->alert('success', 'Delete Success', [
            'html' => 'Contact has been successfully deleted.',
        ]);
    }

    public function getContacts($paginate = true)
    {
        $contacts = (new ContactService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );

        return $contacts;
    }

    public function export()
    {
        return Excel::download(new ContactExport(
            data: $this->getContacts(paginate: false),
        ), 'Contact.xlsx');
    }

    public function render()
    {
        return view('livewire.cms.contact.index', [
            'contacts' => $this->getContacts(),
        ]);
    }
}
