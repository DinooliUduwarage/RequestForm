import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Route, withRouter} from 'react-router-dom';
import Planet from './Planet';
import axios from 'axios';

class PlanetSearch extends Component {
    constructor() {
        super();
        this.state = {
            planets: [],
        };
    }

    componentDidMount() {
        let initialPlanets = [];
        axios.get('http://127.0.0.1:8000/api/requests')
            .then(response => {
                return response.json();
            }).then(data => {
            let initialPlanets = data.results.map((planet) => {
                return planet
            });
            console.log(initialPlanets);
            this.setState({
                planets: initialPlanets
            });
        });
    }

    render() {
        return (
                    <Planet state={this.state}/>
        );
    }
}
export default PlanetSearch;


ReactDOM.render(<PlanetSearch />, document.getElementById('react-search'));