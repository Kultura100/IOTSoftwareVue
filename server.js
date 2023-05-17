const express = require('./node_modules/express/lib/express.js');
const app = express();

const { proxy, scriptUrl } = require('./node_modules/rtsp-relay')(app);

app.ws('/api/stream/:cameraIP', (ws, req) =>
proxy({
  url: `rtsp://${req.params['cameraIP']}/udp/av0_0`,
  verbose: true,
})(ws),
);

app.get('/:cameraIP', (req, res) =>
  res.send(`
  <canvas id='canvas'></canvas>

  <script src='${scriptUrl}'></script>
  <script>
    loadPlayer({
      url: 'ws://' + location.host + '/api/stream/${req.params['cameraIP']}',
      canvas: document.getElementById('canvas')
    });
  console.log(location.host);
  </script>
`),

);

app.listen(2000);