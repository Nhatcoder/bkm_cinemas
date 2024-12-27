import { Head, router } from "@inertiajs/react";
import { PageProps } from "../../types";
import { Swiper, SwiperSlide } from "swiper/react";
import { EffectFade, Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { useEffect } from "react";

export default function Welcome({
  auth,
}: PageProps<{
  laravelVersion: string;
  phpVersion: string;
}>) {
  useEffect(() => {});
  return (
    <>
      <Head title="Laravel  with react" />
      <div className="h-screen max-w-7xl mx-auto">
        <header className="bg-white py-4">
          <div className="flex justify-between items-center">
            <div className="flex items-center">
              <a href="#" className="text-lg font-bold">
                Laravel React
              </a>
            </div>
            <nav className="flex items-center">
              {auth.user ? (
                <ul className="flex items-center">
                  <li>
                    <a href={route("dashboard")} className="px-4 py-2">
                      Dashboard
                    </a>
                  </li>
                </ul>
              ) : (
                <ul className="flex items-center">
                  <li>
                    <a href={route("login")} className="px-4 py-2">
                      Đăng nhập
                    </a>
                  </li>
                  <li>
                    <a href={route("register")} className="px-4 py-2">
                      Đăng ký
                    </a>
                  </li>
                </ul>
              )}
            </nav>
          </div>
        </header>
        <div className="p-4 md:p-6 lg:p-8 bg-gray-100">
          <div className="flex flex-col justify-center items-center h-screen">
            <h1 className="text-3xl font-bold mb-4">
              Chào mừng đến với Laravel và React
            </h1>
            <Swiper
              spaceBetween={30}
              effect={"fade"}
              navigation={true}
              pagination={{
                clickable: true,
              }}
              autoplay={{
                delay: 2000,
              }}
              modules={[EffectFade, Navigation, Pagination, Autoplay]}
              className="mySwiper w-full"
              style={{ height: "500px" }}
            >
              {Array.from({ length: 10 }).map((_, index) => (
                <SwiperSlide key={index} className="swiper-slide">
                  <img
                    src={`https://swiperjs.com/demos/images/nature-${index + 1}.jpg`}
                    className="w-full h-full object-cover"
                  />
                </SwiperSlide>
              ))}
            </Swiper>
          </div>
        </div>
      </div>
    </>
  );
}
