<div class="container">
<div class="row ">
    <div class="col-lg-12 test12">
        <h2>Заявка на <a href="{{ route('order.show', $application->order) }}">{{ $application->order->title ?? '' }}</a> была
            @if ($application->reject) отклонена @include('applications.delete', ['label' => 'Отметить как просмотренное'])
            @else 
                @if ($application->order->accept)
                    одобрена @include('applications.delete', ['label' => 'Отметить как просмотренное'])
                @else рассматривается работодателем 
                    @include('applications.delete', ['label' => 'Отменить'])
                @endif
            @endif
        </h2>
    </div>
</div>
</div>
