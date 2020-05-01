<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {

    }
    public function saved(Topic $topic)
    {
        if (!$topic->slug) {
            // 推送任务到队列
            dispatch(new TranslateSlug($topic));
        }
    }
}
