"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import Cookies from "js-cookie"; // Importez le package js-Cookies
import { useRouter } from "next/navigation"; // Importez le hook useRouter

export default function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [responseOk, setResponseOk] = useState(false);
    const router = useRouter(); // Initialisez le hook useRouter
  
    const handleLogin = async () => {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/login", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ email, password }),
        });
  
        if (response.ok) {
          setResponseOk(true);
          const data = await response.json();
          const token = data.token;
  
          Cookies.set("token", token);
  
          console.log("Login successful");
  
          // Redirigez l'utilisateur vers la page "/home"
          router.push("/home");
        } else {
          console.log("Login failed");
        }
      } catch (error) {
        console.error("Error during login:", error);
      }
    };
  
    useEffect(() => {
      if (responseOk) {
        // Mettez en œuvre d'autres actions en cas de réponse réussie, si nécessaire
      }
    }, [responseOk]);

  return (
    <div className="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">
      <div className="w-full p-6 bg-white rounded-md shadow-md lg:max-w-xl">
        <h1 className="text-3xl font-bold text-center text-gray-700">Logo</h1>
        <form className="mt-6">
          <div className="mb-4">
            <label
              htmlFor="email"
              className="block text-sm font-semibold text-gray-800"
            >
              Email
            </label>
            <input
              type="email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:border-gray-400 focus:ring-gray-300 focus:outline-none focus:ring focus:ring-opacity-40"
            />
          </div>
          <div className="mb-2">
            <label
              htmlFor="password"
              className="block text-sm font-semibold text-gray-800"
            >
              Password
            </label>
            <input
              type="password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:border-gray-400 focus:ring-gray-300 focus:outline-none focus:ring focus:ring-opacity-40"
            />
          </div>
          <Link
            href="/forget"
            className="text-xs text-blue-600 hover:underline"
          >
            Forget Password?
          </Link>
          <div className="mt-2">
            <button
              type="button" // empêche la soumission du formulaire par défaut
              onClick={handleLogin}
              className="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
            >
              Login
            </button>
          </div>
        </form>

        <p className="mt-4 text-sm text-center text-gray-700">
          Don't have an account?{" "}
          <Link
            href="/register"
            className="font-medium text-blue-600 hover:underline"
          >
            Sign up
          </Link>
        </p>
      </div>
    </div>
  );
}
