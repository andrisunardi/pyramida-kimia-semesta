<?php

namespace App\Livewire\CMS\Contact;

use App\Exports\ContactExport;
use App\Livewire\Component;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContactPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function changeActive(Contact $contact): void
    {
        (new ContactService)->active(contact: $contact);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.contact').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Contact $contact): void
    {
        (new ContactService)->delete(contact: $contact);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.contact').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getContacts(bool $paginate = true): object
    {
        return (new ContactService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.contact').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new ContactExport(
            contacts: $this->getContacts(paginate: false),
        ), trans('index.contact').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.contact.index', [
            'contacts' => $this->getContacts(),
        ]);
    }
}
