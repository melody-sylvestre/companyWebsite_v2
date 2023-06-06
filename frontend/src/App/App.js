import { BrowserRouter, Route, Routes } from "react-router-dom"
import AboutUsPage from "../AboutUsPage/AboutUsPage"
import ContactPage from "../ContactPage/ContactPage"
import HomePage from "../HomePage/HomePage"
import Footer from "../Footer/Footer"
import Navbar from '../Navbar/Navbar'
function App() {

  return (
    <div className="App">
      <BrowserRouter>
        <Navbar />

        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/about-us" element={<AboutUsPage />} />
          <Route path="/contact-us" element={<ContactPage />} />
          <Route path="*" element={<HomePage />} />
        </Routes>

        <Footer />
      </BrowserRouter>
    </div>
  )
}

export default App
