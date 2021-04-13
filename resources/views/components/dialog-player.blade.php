<div>
    <div class="media mb-3">
        <div class="media-body pl-3 bg-light ml-5">
            <h5 class="mt-0"></h5>
            <div class="position-relative pb-4 text-right pr-3">
                {{ trans('questions.' . $clue . '.' . rand(0, count(trans('questions.' . $clue)) - 1)) }}
            </div>
        </div>
        <img class="align-self-start rounded-circle mr-3" src="images/avatars/generic-avatar.png" alt="" width="40px">
    </div>
</div>
