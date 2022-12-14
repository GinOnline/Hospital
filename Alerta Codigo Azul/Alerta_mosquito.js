

const mqtt = require('mqtt')
const options = {
  // Clean session
  clean: true,
  connectTimeout: 4000,
  // Auth
  clientId: 'emqx_test',
  username: 'emqx_test',
  password: 'emqx_test',
}
const client  = mqtt.connect('mqtt://192.168.88.127:1883', options)
client.on('connect', function () {
  console.log('Connected')
  client.subscribe('/alerta', function (err) {
    if (!err) {
      client.publish('/alerta', 'Conectado')
    }
  })
})

client.on('message', function (topic, message) {
  // message is Buffer
  console.log(message.toString())
  client.end()
})

mosquitto_pub -d -h localhost -p 1883 -t /alerta -m "ATENCION: Código Azul Quirofano 8"

mosquitto_sub -d -h localhost -p 1883 -t /alerta


