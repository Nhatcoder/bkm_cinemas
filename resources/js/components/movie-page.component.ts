import Alpine from "alpinejs";
import "../jquery-plugin/seatmanager.plugin";
import { IMovie } from "@/types/movie.interface";
import { movieService } from "@/services/movie.service";
import moment, { Moment } from "moment";
import { IGenre } from "@/types/genre";
import { IActor } from "@/types/actor.interfaces";
import { IShowtime } from "@/types/showtime.interface";
import { ICinema } from "@/types/cinema.interface";
import { cinemaService } from "@/services/cinema.service";
import { ICity } from "@/types/city.interface";
import { cityService } from "@/services/city.service";
import { showtimeService } from "@/services/showtime.service";

Alpine.data('MoviePageComponent', (identifier: string) => ({
  movie: {} as IMovie,
  searchCity: '',
  moment: moment,
  genres: [] as IGenre[],
  actors: [] as IActor[],
  cinemas: [] as ICinema[],
  days: [] as Moment[],
  cities: [] as ICity[],
  showModelCity: false,
  selectedCity: {} as ICity,
  formFilter: {
    date: '',
    movie_id: '1',
    city_id: '1',
  },
  showtimesDetail: [] as any[],
  async init() {
    this.cities = await cityService.getCities();
    this.selectedCity = this.cities[0];
    this.cinemas = await cinemaService.getCinemas();
    this.movie = await movieService.getMovie(identifier);
    this.genres = this.movie.movie_genre;
    this.actors = this.movie.actors;
    this.formFilter.date = moment().format('YYYY/MM/DD')
    this.formFilter.city_id = this.cities[0]?.id;
    this.formFilter.movie_id = this.movie.id;
    this.showtimesDetail = await showtimeService.getShowtimeDetailForMovie(this.formFilter);

    this.days = this.generateDays(12);

  },
  generateDays(dayNumber: number): Moment[] {
    const days: Moment[] = [];
    for (let i = 0; i < dayNumber; i++) {
      days.push(moment().add(i, 'days').startOf('day'));
    }
    return days;
  },
  async choseDay(day: Moment) {
    this.formFilter.date = day.format('YYYY/MM/DD');
    this.showtimesDetail = await showtimeService.getShowtimeDetailForMovie(this.formFilter);

  },
  async choseCity(city: ICity) {
    this.selectedCity = city;
    this.formFilter.city_id = city.id;
    this.showModelCity = false;
    this.searchCity = '';
    console.log(this.formFilter);

    this.showtimesDetail = await showtimeService.getShowtimeDetailForMovie(this.formFilter);
  },
  controlVideo(play: boolean) {
    const iframe = $('#youtubeIframe');
    const src = iframe.data('src');
    if (play && !iframe.attr('src')) {
      iframe.attr('src', src);
    } else if (!play && iframe.attr('src')) {
      iframe.removeAttr('src');
    }
  }
}));