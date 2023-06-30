import { useState } from "react"
import ContactForm from "../ContactForm/ContactForm"
import FormSubmittedBox from "../FormSubmittedBox/FormSubmittedBox"
import "./ContactPage.scss"

const ContactMain = () => {

    const [formSubmitted, setFormSubmitted] = useState(false)

    return (
        <main className="contact_main">
            <h1>Contact Us</h1>

            <div className="contact_image_and_textbox">

                <div className="contact_text_container">
                    <p>Et aperiam quod quo voluptatem magnam qui beatae voluptatem id doloremque quod. Ea sunt nesciunt et reiciendis vitae ea alias provident 33 ratione iusto. </p>
                    {formSubmitted ? <FormSubmittedBox /> : <ContactForm setFormSubmitted={setFormSubmitted} />}
                </div>
                <img src="images/logo.jpg" alt="Company logo" className="side_image" />
            </div>
        </main>

    )
}

export default ContactMain