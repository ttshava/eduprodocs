/**
 * Board broadcaster client — bundled by esbuild into public/board-client.js
 * Uses mediasoup-client Device to send screen + audio to the SFU server.
 */
import { Device } from 'mediasoup-client';
window.mediasoupClient = { Device };
