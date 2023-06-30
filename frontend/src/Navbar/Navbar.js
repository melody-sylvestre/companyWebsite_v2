import { Link } from "react-router-dom"
import "./Navbar.scss"

const Navbar = () => {

    return (
        <nav>
            <div className="logo_container">
            <img src="images/logo.jpg" alt="Company's logo" className="navbar_logo"/>
            <span>Company</span>
            </div>
            <div className="links_container">
                <Link to="/" className="link">HOME</Link>
                <Link to="/about-us" className="link">ABOUT US</Link>
                <Link to="/contact-us" className="link">CONTACT US</Link>
                <button>Log in</button>
            </div>
        </nav>
    )
}
export default Navbar