(function () {
  'use strict';

  var statusEl = document.getElementById('status');
  var resultEl = document.getElementById('result');
  var inspectButton = document.getElementById('inspect');

  function renderStatus(ok, message) {
    statusEl.className = 'status ' + (ok ? 'ok' : 'fail');
    statusEl.textContent = message;
  }

  function renderResult(payload) {
    resultEl.textContent = JSON.stringify(payload, null, 2);
  }

  function inspectActiveTab() {
    statusEl.className = 'status pending';
    statusEl.textContent = 'Inspection…';
    resultEl.textContent = '';

    chrome.tabs.query({active: true, currentWindow: true}, function (tabs) {
      var tab = tabs && tabs.length > 0 ? tabs[0] : null;
      if (!tab || typeof tab.id !== 'number') {
        renderStatus(false, 'Aucun onglet actif détecté.');
        return;
      }

      chrome.tabs.sendMessage(tab.id, {type: 'ASAP_RUNTIME_ROBOT_INSPECT'}, function (response) {
        if (chrome.runtime.lastError) {
          renderStatus(false, 'Page non inspectable par cette extension locale.');
          renderResult({error: chrome.runtime.lastError.message});
          return;
        }

        renderStatus(response && response.ok === true, response && response.ok === true ? 'OK — page saine' : 'Attention — anomalie détectée');
        renderResult(response || {error: 'EMPTY_RESPONSE'});
      });
    });
  }

  inspectButton.addEventListener('click', inspectActiveTab);
  inspectActiveTab();
}());
