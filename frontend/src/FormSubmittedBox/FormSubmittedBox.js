import { ReactComponent as IconValid } from '../SVGImages/Icon_Valid.svg'
import "./FormSubmittedBox.scss"

const FormSubmittedBox = () => {
    return (
        <div className="valid_form_box">
            <div className='valid_icon_container'>
                <IconValid/>
            </div>
            <h2>Your message has been sent</h2>
            <p>We will be in contact with you within 24 hours.</p>
        </div>
    )   
}
export default FormSubmittedBox