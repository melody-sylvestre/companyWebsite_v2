import { Link } from "react-router-dom"
import { Swiper, SwiperSlide } from "swiper/react"
import { Navigation, Pagination } from "swiper"
import "swiper/css"
import "swiper/css/navigation"
import "swiper/css/pagination"



import "./Banner.scss"
import { useEffect, useState } from "react"


const Banner = () => {

    const [bannerContents, setBannerContents] = useState(undefined)
    useEffect(() => {
        fetch("https://interview-assessment.api.avamae.co.uk/api/v1/home/banner-details")
            .then(response => response.json())
            .then(data => {
                setBannerContents(data)
            })
    }, [])

    return (
        <div className="banner" >
            {bannerContents ?
                <Swiper
                    navigation={true}
                    pagination={{
                        dynamicBullets: true,
                        clickable: true
                    }}
                    modules={[Navigation, Pagination]}
                    className="mySwiper"
                >
                    <div>
                        {bannerContents.Details?.map((slideInfo, index) => {
                            return (
                                <SwiperSlide key={index} style={{ backgroundImage: `linear-gradient(to right, rgba(0,0,0,1), rgba(0,0,0,0)), url(` + slideInfo.ImageUrl + `)`}} className="banner_slide" >
                                    <div className="banner_text">
                                        <h1>{slideInfo.Title}</h1>
                                        <p>{slideInfo.Subtitle}</p>
                                        <Link to="/contact-us" className="link_banner">Contact us</Link>
                                    </div>
                             
                                </SwiperSlide>
                            )
                        })}
                    </div>
                </Swiper> : <p>Loading...</p>}
        </div>
    )
}

export default Banner