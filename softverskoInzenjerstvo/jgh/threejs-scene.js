import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

// Сцена, камера, рендерер
const scene = new THREE.Scene();
scene.background = new THREE.Color(0xeaf8eb);

const width = 430;
const height = 350;

const camera = new THREE.PerspectiveCamera(
    75,width / height, 0.1, 1000
);
camera.position.set(9, 3, 3); // Слегка сверху и сбоку
camera.lookAt(0, 0, 0);

const renderer = new THREE.WebGLRenderer({ antialias: true, canvas: document.querySelector('#food-3d'), });
renderer.setSize(width, height, false);

// Еда
const loader = new GLTFLoader();
let foodModel;
loader.load('/assets/food_3d.glb', function(gltf) {
  foodModel = gltf.scene;
  foodModel.position.set(0, -1, 1.5);
  foodModel.scale.set(25, 25, 30);
  scene.add(foodModel);

}, function (xhr) {
    // called while loading is progressing
    console.log((xhr.loaded / xhr.total * 100) + '% loaded');
  },
  function (error) {
    // called when loading has errors
    console.log('An error happened', error);
  });

// Свет (не обязателен для MeshNormalMaterial, но пригодится для других)
const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
scene.add(ambientLight);

const directionalLight = new THREE.DirectionalLight(0xffffff, 0.4);
directionalLight.position.set(3, 5, 2);
directionalLight.castShadow = false;
scene.add(directionalLight);

const hemisphereLight = new THREE.HemisphereLight(0xaaaaaa, 0x444444, 0.6);
scene.add(hemisphereLight);

let mouseX = 0;
let mouseY = 0;

window.addEventListener('mousemove', (event) => {
  // Нормализуем координаты мыши в [-1, 1]
  mouseX = (event.clientX / window.innerWidth) * 2 - 1;
  mouseY = -((event.clientY / window.innerHeight) * 2 - 1);
});

function animate() {
    requestAnimationFrame(animate);

    foodModel.position.z = 1.5 +  mouseX * 0.7;
    foodModel.position.y = -1 + mouseY * -0.7;

    renderer.render(scene, camera);
}

animate();