import { Link } from "react-router-dom"
import "./Navbar.scss"

import { ReactComponent as Logo } from '../SVGImages/Logo.svg'
const Navbar = () => {

    return (
        <nav>
            <div className="logo_container">
                <Logo />
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