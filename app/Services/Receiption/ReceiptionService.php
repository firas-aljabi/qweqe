<?php

namespace App\Services\Receiption;

use App\Filter\Reservation\ReservationFilter;
use App\Filter\User\ClientFilter;
use App\Interfaces\Receiption\ReceiptionServiceInterface;
use App\Repository\Receiption\ReceiptionRepository;

class ReceiptionService implements ReceiptionServiceInterface
{
    public function __construct(private ReceiptionRepository $receiptionRepository)
    {
    }
    public function create_client($data)
    {
        return $this->receiptionRepository->create_client($data);
    }
    public function get_reservation(int $id)
    {
        return $this->receiptionRepository->getById($id)->load(['client', 'expert']);
    }
    public function create_reservation($data)
    {
        return $this->receiptionRepository->create_reservation($data);
    }
    public function complete_reservation($data)
    {
        return $this->receiptionRepository->complete_reservation($data);
    }
    public function cancle_reservation($data)
    {
        return $this->receiptionRepository->cancle_reservation($data);
    }
    public function delay_reservation($data)
    {
        return $this->receiptionRepository->delay_reservation($data);
    }


    public function client_reservations(ReservationFilter $reservationFilter = null)
    {
        if ($reservationFilter != null)
            return $this->receiptionRepository->getFilterItems($reservationFilter);
        else
            return $this->receiptionRepository->paginate();
    }


    public function list_of_client(ClientFilter $clientFilter = null)
    {
        if ($clientFilter != null)
            return $this->receiptionRepository->list_of_client($clientFilter);
        else
            return $this->receiptionRepository->paginate();
    }
}
