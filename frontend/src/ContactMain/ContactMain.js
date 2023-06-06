import { useState } from "react"
import ContactForm from "../ContactForm/ContactForm"
import FormSubmittedBox from "../FormSubmittedBox/FormSubmittedBox"
import "./ContactMain.scss"

const ContactMain = () => {

    const [formSubmitted, setFormSubmitted] = useState(false)

    return (
        <main className="contact_main">
            <div className="contact_text_container">
                <h1>Contact Us</h1>
                <p>Et aperiam quod quo voluptatem magnam qui beatae voluptatem id doloremque quod. Ea sunt nesciunt et reiciendis vitae ea alias provident 33 ratione iusto. </p>
                {formSubmitted ? <FormSubmittedBox /> : <ContactForm setFormSubmitted={setFormSubmitted} />}              
            </div>
            
            <img src="images/Img_Contact.png" alt="Company logo" className="side_image" /> 
            
       </main>

    )
}

export default ContactMain