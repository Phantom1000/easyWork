<div class="container">
<div class="row ">
    <div class="col-lg-12 test12">
        <h2>Заявка на <a href="{{ route('order.show', $application->order) }}">{{ $application->order->title ?? '' }}</a>
            @if ($application->reject)была отклонена @include('applications.delete', ['label' => 'Отметить как просмотренное'])
            @else 
                @if ($application->order->accept)
                    была одобрена @include('applications.delete', ['label' => 'Отметить как просмотренное'])
                @else рассматривается работодателем 
                    @include('applications.delete', ['label' => 'Отменить'])
                @endif
            @endif
        </h2>
    </div>
</div>
</div>
