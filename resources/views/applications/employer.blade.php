@if(!$application->order->accept)
    <div class="row">
        <div class="col-lg-12">
            <h2>Заявка на <a href="{{ route('order.show', $application->order) }}">{{ $application->order->title }}</a> от 
                <a style="padding-right: 15px;" href="{{ route('profile', $application->freelancer) }}">{{ $application->freelancer->name }}</a></h2>
            <form action="{{ route('application.accept', $application) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Принять</button>
            </form>
            <form action="{{ route('application.destroy', $application) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Отклонить</button>
            </form>
        </div>
    </div>
@endif