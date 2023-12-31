# system-template

# Installation
- Clone this repository
```bash
git clone https://github.com/aldrin112602/system-template.git
cd system-template
```

# Start development server
```bash
npm run serve
```
- This will start development server at `localhost:8000`

# CLI File Generator
This is a simple PHP CLI script for generating controller, model, and view files in a predefined directory structure. It can be used to streamline the process of creating components in a PHP project.

## Usage

```bash
php create.php <type> <name>
```

- `<type>`: Type of file to create (controller, model, view)
- `<name>`: Name of the file to be created (camelCase)

# Examples

```bash
php create.php controller MyController
php create.php model MyModel
php create.php view MyView
```



# File Structure
- Controllers: `src/Controller`
- Models: `src/Model`
- Views: `src/View/<name>/index.twig`