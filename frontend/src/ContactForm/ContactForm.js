import "./ContactForm.scss"
import { ReactComponent as IconSubmit } from '../SVGImages/Icon_Submit.svg'
import { useState } from "react"

const ContactForm = (props) => {

  const [basicFormFields, setBasicFormFields] = useState(
    {
      FullName: "",
      EmailAddress: "",
      Message: "",
      PhoneNumber1: "",
      PhoneNumber2: "",
      PhoneNumber3: ""
    })

  const [bIncludeAddressDetails, setBIncludeAddressDetails] = useState(0)
  const [addressDetails, setAddressDetails] = useState(
    {
      AddressLine1: "",
      AddressLine2: "",
      CityTown: "",
      StateCounty: "",
      Postcode: "",
      Country: ""
    })

  const handleChangeBasicFormFields = (event) => {
    let newBasicFormFields = { ...basicFormFields }
    newBasicFormFields[event.target.name] = event.target.value
    setBasicFormFields(newBasicFormFields)
  }

  const handleAddressCheckBox = (event) => {
    if (event.target.checked) {
      setBIncludeAddressDetails(1)
    } else {
      setBIncludeAddressDetails(0)
    }
  }

  const handleChangeAddress = (event) => {
    let newAddressDetails = { ...addressDetails }
    newAddressDetails[event.target.name] = event.target.value
    setAddressDetails(newAddressDetails)
  }

  const handleSubmit = (event) => {
    event.preventDefault();

    let formAnswers =
    {
      FullName: basicFormFields.FullName,
      EmailAddress: basicFormFields.EmailAddress,
      PhoneNumber1: basicFormFields.PhoneNumber1,
      PhoneNumber2: basicFormFields.PhoneNumber2,
      PhoneNumber3: basicFormFields.PhoneNumber3,
      MessageText: basicFormFields.Message,
      bIncludeAddressDetails: bIncludeAddressDetails,
      AddressLine1: addressDetails.AddressLine1,
      AddressLine2: addressDetails.AddressLine2,
      CityTown: addressDetails.CityTown,
      Postcode: addressDetails.Postcode,
      StateCounty: addressDetails.StateCounty,
      Country: addressDetails.Country
    }
    fetch("http://0.0.0:8080/contact-us", {
      method: "POST",
      body: JSON.stringify(formAnswers),
      headers: {
        "Content-Type": 'application/json',
      }
    }).then(response => {
      console.log(response)
      return response.json()
    }).then(responseBody => {
      if (responseBody.Status === "200") {
        props.setFormSubmitted(true)
      } else {
        props.setFormSubmitted(false)
        alert(responseBody.Message)
      }

    })
  }

  return (
    <form onSubmit={handleSubmit}>
      <div className="name_and_email_section">
        <div className="form_field_and_label">
          <label htmlFor="name">Full name</label>
          <input type="text" name="FullName" id="name" value={basicFormFields.FullName || ""} required onChange={event => handleChangeBasicFormFields(event)} />
        </div>
        <div className="form_field_and_label">
          <label htmlFor="email">Email address</label>
          <input type="email" id="email" name="EmailAddress" value={basicFormFields.EmailAddress || ""} required onChange={event => handleChangeBasicFormFields(event)} />
        </div>
      </div>

      <div className="phone_numbers_section">
        <div className="form_field_and_label">
          <label htmlFor="phone_number_1">Phone number 01 <span> - with prefix (e.g. +44123456789) </span></label>
          <input type="tel" name="PhoneNumber1" pattern="\+[0-9]{1,3}[0-9]{6,14}" required
            id="phone_number_1" value={basicFormFields.PhoneNumber1} onChange={event => handleChangeBasicFormFields(event)} />
        </div>

        <div className="form_field_and_label">
          <label htmlFor="phone_number_2">Phone number 02 <span> - optional </span></label>
          <input type="tel" name="PhoneNumber2" id="phone_number_2" pattern="\+[0-9]{1,3}[0-9]{6,14}" value={basicFormFields.PhoneNumber2} onChange={event => handleChangeBasicFormFields(event)} />
        </div>

        <div className="form_field_and_label">
          <label htmlFor="phone_number_3">Phone number 03 <span> - optional </span></label>
          <input type="tel" name="PhoneNumber3" id="phone_number_3" pattern="\+[0-9]{1,3}[0-9]{6,14}" value={basicFormFields.PhoneNumber3} onChange={event => handleChangeBasicFormFields(event)} />
        </div>
      </div>

      <div className="message_section form_field_and_label">
        <label htmlFor="Message">Message</label>
        <textarea name="Message" id="Message" value={basicFormFields.Message || ""} required onChange={event => handleChangeBasicFormFields(event)} />
      </div>

      <div className="address_checkbox_container">
        <input type="checkbox" name="address_checkbox" id="address_checkbox" checked={bIncludeAddressDetails} onChange={event => handleAddressCheckBox(event)} />
        <label className="label_checkbox" htmlFor="address_checkbox">Add address details</label>
      </div>
      {bIncludeAddressDetails ?
        <div className="address_details">
          <div className="address_lines">
            <div className="form_field_and_label">
              <label htmlFor="address_line1">Address line 1</label>
              <input type="text" name="AddressLine1" id="address_line1" required value={addressDetails.AddressLine1 || ""} onChange={event => handleChangeAddress(event)} />
            </div>
            <div className="form_field_and_label">
              <label htmlFor="address_line2">Address line 2</label>
              <input type="text" name="AddressLine2" id="address_line2" value={addressDetails.AddressLine2 || ""} onChange={event => handleChangeAddress(event)} />
            </div>
          </div>

          <div className="city_and_country_details">
            <div className="form_field_and_label">
              <label htmlFor="city">City/Town</label>
              <input type="text" name="CityTown" id="city" value={addressDetails.CityTown || ""} required onChange={event => handleChangeAddress(event)} />
            </div>
            <div className="form_field_and_label">
              <label htmlFor="state">State/County</label>
              <input type="text" name="StateCounty" id="state" value={addressDetails.StateCounty || ""} onChange={event => handleChangeAddress(event)} />
            </div>
            <div className="form_field_and_label">
              <label htmlFor="postcode">Postcode</label>
              <input type="text" name="Postcode" id="postcode" value={addressDetails.Postcode || ""} required onChange={event => handleChangeAddress(event)} />
            </div>
            <div className="form_field_and_label">
              <label htmlFor="country">Country</label>
              <input type="text" name="Country" id="country" value={addressDetails.Country || ""} required onChange={event => handleChangeAddress(event)} />
            </div>
          </div>
        </div>
        : ""}

      <button className="submit_button" type="submit">
        <div className="submit_icon_container">
          <IconSubmit />
        </div>
        Submit
      </button>
    </form>
  )
}

export default ContactForm