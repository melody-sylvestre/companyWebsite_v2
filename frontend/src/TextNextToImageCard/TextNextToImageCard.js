import { Link } from "react-router-dom"
import "./TextNextToImageCard.scss"

const TextNextToImageCard = () => {
    return (
        <div className="text_next_to_image_card">
            <div className="text_container">
                <h2>Lorem ipsum dolor sit amet</h2>
                <p>
                Qui quis atque quo enim optio ut totam iste et ullam animi. Id molestias culpa eos nisi mollitia qui autem consectetur aut consectetur voluptas eum dolorem voluptatem et quas laudantium. Et voluptatibus excepturi et similique nobis qui ratione tempora id praesentium doloremque eum dolores officia? Qui enim laborum eum assumenda architecto qui labore culpa. 
                </p>
                <ul>
                    <li>Cum aliquid dolorem vel quia repudiandae aut perferendis porro.</li>
                    <li>Eum quidem saepe ex nisi saepe et eaque consequatur sit voluptates temporibus.</li>
                    <li>Et fugit repudiandae eum maiores dolore et aliquam quam.</li>
                    <li>Sed asperiores distinctio et obcaecati quia id placeat commodi.</li>
                    
                </ul>
                <button>Learn more</button>
                
            </div>
            <img src="images/shutterstock_696636415.jpg" alt="An office space" className="card_image"/>
        </div>
    )
}
export default TextNextToImageCard