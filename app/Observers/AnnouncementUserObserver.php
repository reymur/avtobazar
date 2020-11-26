<?php

namespace App\Observers;

use App\AnnouncementUser;
use App\Events\OrdersCount;

class AnnouncementUserObserver
{
    /**
     * Handle the announcement user "created" event.
     *
     * @param  \App\AnnouncementUser  $announcementUser
     * @return void
     */
    public function created(AnnouncementUser $announcementUser)
    {
//        if( $announcementUser->user_id === Auth::user()->id ){
            event( new OrdersCount($announcementUser->announcement_id) );
//        }
    }

    /**
     * Handle the announcement user "updated" event.
     *
     * @param  \App\AnnouncementUser  $announcementUser
     * @return void
     */
    public function updated(AnnouncementUser $announcementUser)
    {
        //
    }

    /**
     * Handle the announcement user "deleted" event.
     *
     * @param  \App\AnnouncementUser  $announcementUser
     * @return void
     */
    public function deleted(AnnouncementUser $announcementUser)
    {
        //
    }

    /**
     * Handle the announcement user "restored" event.
     *
     * @param  \App\AnnouncementUser  $announcementUser
     * @return void
     */
    public function restored(AnnouncementUser $announcementUser)
    {
        //
    }

    /**
     * Handle the announcement user "force deleted" event.
     *
     * @param  \App\AnnouncementUser  $announcementUser
     * @return void
     */
    public function forceDeleted(AnnouncementUser $announcementUser)
    {
        //
    }
}
