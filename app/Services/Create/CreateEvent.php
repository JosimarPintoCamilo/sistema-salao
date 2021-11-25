<?php

namespace App\Services\Create;

use App\Models\Event;

class CreateEvent
{
    public function create(
        $description,
        $begin,
        $end,
        $notebookId,
        $customerId,
        $professionalId,
        $confirmed = 1
    ) {
        $event = new Event;

        $event->description = $description;
        $event->begin = $begin;
        $event->end = $end;
        $event->notebook_id = $notebookId;
        $event->customer_id = $customerId;
        $event->professional_id = $professionalId;
        $event->confirmed = $confirmed;

        $event->save();

        return $event;
    }
}
