import Banner from "../Banner/Banner"
import CardWithBackgroundImage from "../CardWithBackgroundImage/CardWithBackgroundImage"
import PlainTextCard from "../PlainTextCard/PlainTextCard"
import TextNextToImageCard from "../TextNextToImageCard/TextNextToImageCard"

const HomePage = () => {
    return (
        <>
            <Banner/>
            <TextNextToImageCard/>
            <CardWithBackgroundImage/>
            <PlainTextCard/>
        </>
    )
}

export default HomePage