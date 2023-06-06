import "./ContactForm.scss"
import { ReactComponent as IconSubmit } from '../SVGImages/Icon_Submit.svg'
import { useState } from "react"


const ContactForm = (props) => {

  const [basicFormFields, setBasicFormFields] = useState(
    {
      FullName: "",
      EmailAddress: "",
      Message: "",
    })

  const [phoneNumbers, setPhoneNumbers] = useState([""])
  const [bIncludeAddressDetails, setBIncludeAddressDetails] = useState(false)
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

  const handleChangePhoneNumber = (index, event) => {
    let newPhoneNumbers = [...phoneNumbers]
    newPhoneNumbers[index] = event.target.value
    setPhoneNumbers(newPhoneNumbers)
  }

  const addPhoneNumberField = () => {
    setPhoneNumbers([...phoneNumbers, ""])
  }

  const handleAddressCheckBox = (event) => {
    if (event.target.checked) {
      setBIncludeAddressDetails(true)
    } else {
      setBIncludeAddressDetails(false)
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
      Message: basicFormFields.Message,
      bIncludeAddressDetails: bIncludeAddressDetails,
      AddressDetails: addressDetails
    }

    const formLabels =
    {
      FullName: "Full name",
      EmailAddress: "Email address",
      PhoneNumbers: "Phone number",
      Message: "Message",
      bIncludeAddressDetails: "Add address details",
      "AddressDetails.AddressLine1": "Address line 1",
      "AddressDetails.AddressLine2": "Address line 2",
      "AddressDetails.CityTown": "City/Town",
      "AddressDetails.StateCounty": "State/County",
      "AddressDetails.Postcode": "Postcode",
      "AddressDetails.Country": "Country"
    }


    // the API does not accept empty phone numbers - so the PhoneNumbers field should be added 
    // to the request only if users have entered at least one phone number  
    let nonEmptyPhoneNumbers = [...phoneNumbers]
    nonEmptyPhoneNumbers = nonEmptyPhoneNumbers.filter((item) => item.trim() !== "")

    if (nonEmptyPhoneNumbers.length !== 0) {
      formAnswers.PhoneNumbers = [...nonEmptyPhoneNumbers]
    }

    fetch("https://interview-assessment.api.avamae.co.uk/api/v1/contact-us/submit", {
      method: "POST",
      body: JSON.stringify(formAnswers),
      headers: {
        "Content-Type": 'application/json'
      }
    }).then(response => {
      return response.json()
    }).then(responseBody => {
      if (responseBody.Status === "1") {
        props.setFormSubmitted(true)
      } else {
        props.setFormSubmitted(false)
        responseBody.Errors.forEach(((error) => {
          alert(formLabels[error.FieldName] + ": " + error.MessageCode.replaceAll("_", " "))
        }))
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
          <input type="text" id="email" name="EmailAddress" value={basicFormFields.EmailAddress || ""} required onChange={event => handleChangeBasicFormFields(event)} />
        </div>
      </div>

      <div className="phone_numbers_section">
        {phoneNumbers.map((element, index) => (
          <div className="form_field_and_label" key={index}>
            <label htmlFor={"phone_number_" + (index + 1)}>{index < 9 ? "Phone number 0" + (index + 1) : "Phone number " + (index + 1)} <span> - optional </span></label>
            <input type="tel" name="phoneNumber" id={"phone_number_" + (index + 1)} value={element || ""} onChange={event => handleChangePhoneNumber(index, event)} />
          </div>
        ))}
        <button className="add_phone_number_button" type="button" onClick={() => addPhoneNumberField()}>Add new phone number</button>
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
            <div className="city_county_fields">
              <div className="form_field_and_label">
                <label htmlFor="city">City/Town</label>
                <input type="text" name="CityTown" id="city" value={addressDetails.CityTown || ""} required onChange={event => handleChangeAddress(event)} />
              </div>
              <div className="form_field_and_label">
                <label htmlFor="state">State/County</label>
                <input type="text" name="StateCounty" id="state" value={addressDetails.StateCounty || ""} required onChange={event => handleChangeAddress(event)} />
              </div>
            </div>
            <div className="postcode_country_fields">
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