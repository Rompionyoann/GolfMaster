// Importez les dépendances nécessaires
import Link from "next/link";

// Composant de la barre de navigation
const Navbar = () => {
  return (
    <nav className="mt-4 flex justify-between items-center">
      {/* Bouton "Clubs" avec lien */}
      <Link href="/home" className="text-lg font-semibold">
        <div className="bg-black p-2 rounded-md">
          <span className="text-white">Clubs</span>
        </div>
      </Link>

      {/* Bouton "Profile" avec lien */}
      <Link href="/profile" className="text-lg font-semibold">
        <div className="bg-black p-2 rounded-md">
          <span className="text-white">Profile</span>
        </div>
      </Link>
    </nav>
  );
};

export default Navbar;
