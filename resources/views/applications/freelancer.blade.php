<div class="row">
    <div class="col-lg-12">
        <h2>Заявка на <a href="{{ route('order.show', $application->order) }}">{{ $application->order->title }}</a>
            @if ($application->order->accept)
                @if ($application->order->freelancer->id == Auth::user()->id)
                    была одобрена
                @else
                    была отклонена
                @endif
            <form action="{{ route('application.destroy', $application) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Отметить как просмотренное</button>
            </form>
            @else рассматривается работодателем 
            <form action="{{ route('application.destroy', $application) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Отменить</button>
            @endif
        </h2>
    </div>
</div>