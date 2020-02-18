import webservice from "../../../app/webservice/Webservice";

export default player => {
    webservice.city.random().then(city => {
        if (city.region.id === player.toCity.region.id) {
            console.error('rolled same region, need to open editor to pick region');
        } else {
            player.fromCityId = player.toCityId;
            player.fromCity = player.toCity;

            player.toCityId = city.id;
            player.toCity = city;

            webservice.player.save({id: player.id, toCityId: player.toCityId, fromCityId: player.fromCityId});

            webservice.payout(player.fromCityId, player.toCityId)
                .then(payout => player.payout = payout);
        }
    });
}
