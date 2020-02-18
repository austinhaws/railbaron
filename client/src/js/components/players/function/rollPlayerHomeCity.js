import webservice from "../../../app/webservice/Webservice";

export default player => {
    webservice.city.random().then(city => {
        player.homeCityId = city.id;
        player.homeCity = city;
        webservice.player.save({id: player.id, homeCityId: player.homeCityId});
    });
}
