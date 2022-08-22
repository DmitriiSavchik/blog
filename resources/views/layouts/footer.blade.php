<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav-footer">
    <div class="footer">
        <div class="footer-container">

            <div class="widget">
                <div class="weather-main">
                    <div class="weather-main-info">
                        <h3>{{\App\Facade\Weather::generalInformation()->getNameCity()}}</h3>

                        <p>температура: {{\App\Facade\Weather::temperatures()->getTemperature()}} °C, ощущается
                            как: {{\App\Facade\Weather::temperatures()->getFeelsLikeTemperature()}} °C</p>
                        <p>давление: {{\App\Facade\Weather::pressure()->getPressure()}} мм рт. ст.
                            влажность: {{\App\Facade\Weather::pressure()->getHumidity()}}%</p>
                    </div>
                </div>
            </div>

            <div class="widget">
                <h3 class="widget-title text-uppercase ">Подписаться</h3>
                <form action="{{ route("subscribe") }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Введите Ваш E-mail">
                    <input type="submit" value="ok"
                           class="text-uppercase text-center btn btn-subscribe">
                </form>
            </div>

        </div>
    </div>
</nav>
