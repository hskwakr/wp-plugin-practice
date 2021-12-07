#!/bin/sh

set -e

# Download wordpress plugin boilerplate then rename it
# https://github.com/DevinVinson/WordPress-Plugin-Boilerplate#installation


# Localtion to plugins
PLUGIN_PATH="html/wp-content/plugins"

# Names
PLUGIN_NAME="hskwakr practice youtube"
# For example: plugin-name
PLUGIN_FILE="hskwakr-practice-youtube"
# For example: plugin_name
PLUGIN_SLUG="hskwakr_practice_youtube"
# Link to this plugin
PLUGIN_LINK="https://github.com/hskwakr/wp-plugin-practice"

# Author
PLUGIN_AUTHOR_NAME="hskwakr"
PLUGIN_AUTHOR_MAIL="33633391+hskwakr@users.noreply.github.com"
PLUGIN_AUTHOR_LINK="https://github.com/hskwakr"

# Boilerplate
BP_URL="https://github.com/devinvinson/WordPress-Plugin-Boilerplate/archive/master.zip"
BP_NAME="bp"

# Original names
ORIGIN_NAME="WordPress Plugin Boilerplate"
ORIGIN_FILE="plugin-name"
ORIGIN_SLUG="plugin_name"

ORIGIN_AUTHOR_NAME_1="Your Name"
ORIGIN_AUTHOR_NAME_2="or Your Company"
ORIGIN_AUTHOR_MAIL="email@example.com"

ORIGIN_LINK="http://example.com"
ORIGIN_AUTHOR_LINK="${ORIGIN_LINK}/"
ORIGIN_PLUGIN_LINK="${ORIGIN_LINK}/${PLUGIN_FILE}-uri/"

# Current directory
DIR="$( cd "$( dirname "$0" )" && pwd )"

# Check a given value is an available or not
# For more details:
#   help type
has() {
  type "$1" >/dev/null 2>&1
}

if ! has "wget"; then
  echo "wget required"
  exit 1
fi

if ! has "unzip"; then
  echo "unzip required"
  exit 1
fi

if ! has "sed"; then
  echo "sed required"
  exit 1
fi

if ! has "xargs"; then
  echo "xargs required"
  exit 1
fi

# Check ${PLUGIN_PATH} is exist or not
if [ ! -d "${DIR}/${PLUGIN_PATH}" ]; then
  echo "PLUGIN_PATH does not exist."
  echo "PLUGIN_PATH: ${PLUGIN_PATH}"
  exit 1
fi

# Remove plugin if ${PLUGIN_FILE} plugin is already exist
if [ -d "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}" ]; then
  echo "Remove old ${PLUGIN_FILE}..."
  sudo rm -r "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE:?}"
fi

echo "Download zip file..."
# Download a boilerplate from url
wget -O "${DIR}/${BP_NAME}.zip" "${BP_URL}"

echo "Extract zip file..."
# Extract zip file
unzip "${DIR}/${BP_NAME}.zip" -d "${DIR}/${BP_NAME}"

echo "Copy plugin to ${PLUGIN_PATH}..."
# Copy plugin directory to plugin localtion
sudo cp -r "${DIR}/${BP_NAME}/WordPress-Plugin-Boilerplate-master/plugin-name" "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}"

echo "Change ownership for plugin directory..."
# Change ownership
sudo chown -R "${USER}" "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}"

# Rename
# plugin_name
ORIGIN_NAME_1="${ORIGIN_SLUG}"
# plugin-name
ORIGIN_NAME_2="${ORIGIN_FILE}"
# Plugin_Name
ORIGIN_NAME_3="$(echo ${ORIGIN_SLUG} | sed 's/[^_]\+/\L\u&/g')"
# PLUGIN_NAME_
ORIGIN_NAME_4="$(echo ${ORIGIN_SLUG} | sed 's/[a-z]/\U&/g')"_

# For example: plugin_name
PLUGIN_NAME_1="${PLUGIN_SLUG}"
# For example: plugin-name
PLUGIN_NAME_2="${PLUGIN_FILE}"
# For example: Plugin_Name
PLUGIN_NAME_3="$(echo ${PLUGIN_SLUG} | sed 's/[^_]\+/\L\u&/g')"
# For example: PLUGIN_NAME_
PLUGIN_NAME_4="$(echo ${PLUGIN_SLUG} | sed 's/[a-z]/\U&/g')"_

# Rename plugin files
echo "Rename files from ${ORIGIN_FILE} to ${PLUGIN_FILE}..."
# Find list of files that have ${ORIGIN_FILE} in name
REPLACE_FILES=$(find "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}" -name "*${ORIGIN_FILE}*" |\
# Omit plugin path from ${REPLACE_FILES}
sed "s%${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}/%%g")

for file in ${REPLACE_FILES}; do
  # Prepare a replaced name 
  replaced=$(echo "${file}" | sed "s/${ORIGIN_FILE}/${PLUGIN_FILE}/g")
  # Rename a file
  mv "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}/${file}" "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}/${replaced}"
done

# Rename names in plugin
change_name() {
  find "${DIR}/${PLUGIN_PATH}/${PLUGIN_FILE}" -name "*.*" -print0 | xargs -0 sed -i -e "s%${1}%${2}%g"
}

echo "Change name from ${ORIGIN_NAME} to ${PLUGIN_NAME}..."
change_name "${ORIGIN_NAME}" "${PLUGIN_NAME}"
echo "Change name from ${ORIGIN_NAME_1} to ${PLUGIN_NAME_1}..."
change_name "${ORIGIN_NAME_1}" "${PLUGIN_NAME_1}"
echo "Change name from ${ORIGIN_NAME_2} to ${PLUGIN_NAME_2}..."
change_name "${ORIGIN_NAME_2}" "${PLUGIN_NAME_2}"
echo "Change name from ${ORIGIN_NAME_3} to ${PLUGIN_NAME_3}..."
change_name "${ORIGIN_NAME_3}" "${PLUGIN_NAME_3}"
echo "Change name from ${ORIGIN_NAME_4} to ${PLUGIN_NAME_4}..."
change_name "${ORIGIN_NAME_4}" "${PLUGIN_NAME_4}"

# Change author
echo "Change name from ${ORIGIN_AUTHOR_NAME_1} to ${PLUGIN_AUTHOR_NAME}..."
change_name "${ORIGIN_AUTHOR_NAME_1}" "${PLUGIN_AUTHOR_NAME}"
echo "Change name from ${ORIGIN_AUTHOR_MAIL} to ${PLUGIN_AUTHOR_MAIL}..."
change_name "${ORIGIN_AUTHOR_MAIL}" "${PLUGIN_AUTHOR_MAIL}"
# Omit " or Your Campany"
change_name "${ORIGIN_AUTHOR_NAME_2}" 

# Change link (order is important)
# Change link to plugin
echo "Change name from ${ORIGIN_PLUGIN_LINK} to ${PLUGIN_LINK}..."
change_name "${ORIGIN_PLUGIN_LINK}" "${PLUGIN_LINK}"

# Change link to author
echo "Change name from ${ORIGIN_AUTHOR_LINK} to ${PLUGIN_AUTHOR_LINK}..."
change_name "${ORIGIN_AUTHOR_LINK}" "${PLUGIN_AUTHOR_LINK}"

# Change link to this plugin
echo "Change name from ${ORIGIN_LINK} to ${PLUGIN_LINK}..."
change_name "${ORIGIN_LINK}" "${PLUGIN_LINK}"

# Remove temporal files
echo "Remove temporal files..."
# Remove zip file
rm "${DIR}/${BP_NAME}.zip"
# Remove extracted file
rm -r "${DIR}/${BP_NAME:?}"

echo "Completed."
